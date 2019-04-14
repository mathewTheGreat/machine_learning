
# function to select a random vector  
def random_vector(minmax)
  return Array.new(minmax.size) do |i|
    minmax[i][0] + ((minmax[i][1] - minmax[i][0]) * rand())
  end
end


def initialize_vectors(inputData, width, height)
  weights_vectors = []
  width.times do |x|
    height.times do |y|
      weights = {}
      weights[:vector] = random_vector(inputData)
      weights[:coord] = [x,y]
      weights_vectors << weights
    end
  end
  return weights_vectors
end

# function to calculate the euclidean_distance
def euclidean_distance(c1, c2)
  sum = 0.0
  c1.each_index {|i| sum += (c1[i]-c2[i])**2.0}
  return Math.sqrt(sum)
end

# function to get BMU
def get_best_matching_unit(weights_vectors, pattern)
  best, b_dist = nil, nil
  weights_vectors.each do |weights|
    dist = euclidean_distance(weights[:vector], pattern)
    best,b_dist = weights,dist if b_dist.nil? or dist<b_dist
  end
  return [best, b_dist]
end


# function to get neighboring vectors to the bmu
def get_vectors_in_neighborhood(bmu, weights_vectors, neigh_size)
  neighborhood = []
  weights_vectors.each do |other|
    if euclidean_distance(bmu[:coord], other[:coord]) <= neigh_size
      neighborhood << other
    end
  end
  return neighborhood
end


def update_weights_vector(weights, pattern, lrate)
  weights[:vector].each_with_index do |v,i|
    error = pattern[i]-weights[:vector][i]
    weights[:vector][i] += lrate * error
  end
end

def train_network(vectors, mapNodes, iterations, l_rate, neighborhood_size)
  iterations.times do |iter|
    pattern = random_vector(mapNodes)
    lrate = l_rate * (1.0-(iter.to_f/iterations.to_f))
    neigh_size = neighborhood_size * (1.0-(iter.to_f/iterations.to_f))
    bmu,dist = get_best_matching_unit(vectors, pattern)
    neighbors = get_vectors_in_neighborhood(bmu, vectors, neigh_size)
    neighbors.each do |node|
      update_weights_vector(node, pattern, lrate)
    end
    puts ">training: neighbors=#{neighbors.size}, bmu_dist=#{dist}"
  end
end


def execute(inputData, mapNodes, iterations, l_rate, neigh_size, width, height)
  vectors = initialize_vectors(inputData, width, height)
  # summarize_vectors(vectors)
  train_network(vectors, mapNodes, iterations, l_rate, neigh_size)
  # summarize_vectors(vectors)
  return vectors
end

if __FILE__ == $0
  # sample data
  inputData = [[0.0,1,1.0],[0.0,1,1.0],[0.0,1,1.0]]

  #map nodes
  mapNodes = [[0, 0, 0],[0, 0, 1],[0, 0, 0.5],[0.125, 0.529, 1.0],[0.33, 0.4, 0.67],[0.6, 0.5, 1.0],
          [0.0, 1.0, 0.0],
          [1.0, 0.0, 0.0],
          [0.0, 1.0, 1.0],
          [1.0, 0.0, 1.0],
          [1.0, 1.0, 0.0],
          [1.0, 1.0, 1.0],
          [0.33, 0.33, 0.33],
          [0.5, 0.5, 0.5],
          [0.66, 0.66, 0.66]]
  

  # number of iterations
  iterations = 400

  # learning rate
  l_rate = 0.3

# total number of neighbours
  neigh_size = 5

# map size
  width, height = 5, 5


  execute(inputData, mapNodes, iterations, l_rate, neigh_size, width, height)
end